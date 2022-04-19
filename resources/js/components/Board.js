import axios from 'axios';
import React from 'react';
import Modal from 'react-modal';
import WordSuggestions from './WordSuggestions.js';

export class Board extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      currentBoard: [[]],
      boardStack: [],
      sentence: [],
      loading: true,
      folderPath: [],
      isHoldingTile: false,
      activeHoldTimeoutID: null,
      configuringTile: false,
      chosenToEditTile: false,
      heldTileId: null,
      heldTileColumn: null,
      heldTileRow: null,
      heldTileText: null,
      heldTileColor: null,
      confirmDeleteModal: false,
      editModal: false,
      createModal: false,
      selectedFile: false,
      errorModal: false,
      errorMessage: null,
      swapModal: false,
      boards: []
    };

    this.handleEditSubmit = this.handleEditSubmit.bind(this);

  }

  componentDidMount = () => {
    this.fetchBoardTiles();
  }
  fetchBoards = () => {
    let user_id = document.getElementById('user-id').innerText; //couldn't get the props to work with the user_id so I did it this way
    axios.get(`/users/${user_id}/boards`)
      .then( response => {
        this.setState({
          boards: response.data
        });
      });
  }
  fetchBoardTiles = () => {
    axios.get(`/boards/${this.props.board_id}/tiles`)
      .then( response => {
        this.setState({
          currentBoard: response.data,
          boardStack: [response.data],
          loading: false,
          folderPath: [response.data.name]
        });
      });
  }

  handleFolderClick = (folder, folderName) => {
    this.setState( state => ({
      currentBoard: folder,
      boardStack: [...state.boardStack, folder],
      folderPath: [...state.folderPath, folderName]
    }));
  }

  userIsOnBaseBoard = () => {
    return this.state.boardStack.length <= 1;
  }

  handleLastFolderButton = () => {
    this.setState(state => ({
      boardStack: state.boardStack.slice(0, -1),
      currentBoard: state.boardStack[state.boardStack.length - 2],
      folderPath: state.folderPath.slice(0, -1)
    }));
  }

  handleWordClick = (wordText) => {
    this.setState(state => ({
      sentence: [...state.sentence, wordText]
    }));
  }

  handleBackspaceButtonClick = () => {
    this.setState(state => ({
      sentence: state.sentence.slice(0, -1)
    }));
  }


  handleSpeakButtonClick = (event, audio_level) => {
    // TODO set TTS voice according to user settings
    let synth = window.speechSynthesis;
    let utterance = new SpeechSynthesisUtterance(this.buildSentence());
    utterance.volume = audio_level;
    synth.speak(utterance);

    // TODO clear sentence only after it's done being read out instead of
    // default 500 millliseconds
    setTimeout(() => this.setState({
      sentence: []
    }), 500);
  }

  buildSentence = () => {
    return this.state.sentence.join(' ');
  }

  renderBoardTiles = () => {
    if (this.state.loading) {
      return null;
    }

    return this.state.currentBoard.contents.map( (row, rowIndex) =>
      <tr>
      { row.map( (tile, columnIndex) => {
        const tileType = tile == 'blank' ? 'blank' : (tile.contents ? 'folder' : 'word');
        const tileText = tile.contents ? tile.name : tile.text;
        return <td style={{ "backgroundColor": `${tile.color}`}}
            className="default-tile"
                   onClick={tileType == 'blank'
                            ? () => {}
                            : (tile.contents
                              ? () => this.handleFolderClick(tile, tile.name)
                              : () => this.handleWordClick(tile.text))}
            onMouseDown={() => this._onHoldStart(tileType, tile.id, columnIndex, rowIndex, tileText, tile.color)}
            onTouchStart={() => this._onHoldStart(tileType, tile.id, columnIndex, rowIndex, tileText, tile.color)}
            onMouseUp={this._onHoldEnd}
            onMouseOut={() => { // FIXME for drag and drop
            }}
            onTouchEnd={this._onHoldEnd}
            onTouchCancel={this._onHoldEnd}
        >
          {tileType === 'blank' ? '+' : ((tile.text ?? tile.name) + ' ')} <br></br>
          {tile.icon != null && <img className="tile-icons" src={tile.icon} style={{border: '1px solid '}}/>}
        </td>
      })}
      </tr>
    );
  }

  renderFolderPath = () => {    
    return this.state.folderPath.map(folder =>
      <td> { folder} {'>'}</td>
      );
  }
  renderBoards = () => {
    return this.state.boards.map(({name, id}) => 
      <button className="board-select-button" key={name} formAction={"/boards/" + id}> { name } </button>
      );
  }
  //_onHoldStart and _onHoldEnd borrowed from: https://www.youtube.com/watch?v=A95mIE2HdcY
  _onHoldStart = (tileType, tileId, tileX, tileY, tileText, tileColor) => {
      if (this.props.board_id == '1') {
        return;
      }

      this.setState({
        isHoldingTile: true,
        activeHoldTimeoutID: setTimeout(() => {
            if (this.state.isHoldingTile) {
              this.setState({
                configuringTile: tileType != 'blank',
                createModal: tileType == 'blank',
                heldTileId: tileId,
                heldTileType: tileType,
                heldTileRow: tileY,
                heldTileColumn: tileX,
                heldTileText: tileText,
                heldTileColor: tileColor,
              });
            }
          }, 1000),
        });
      ;
    }

  _onHoldEnd = () => {
    if (this.props.board_id === '1') {
      return;
    }

    this.setState({
      isHoldingTile: false,
    });
        
    clearTimeout(this.state.activeHoldTimeoutID);
  }

  handleEditTile = () => {
    this.setState({
      chosenToEditTile: true
    });
  }

  handleDeleteTile = () => {
    const parentType = this.state.folderPath.length === 1
      ? 'boards'
      : 'folders';

    const parentId = this.state.boardStack[this.state.boardStack.length - 1].id;

    // for DELETE calls only w/ axios, need to supply `data` key explicitly
    axios.delete(`/${parentType}/${parentId}/tile/delete`, {
      data: {
        tileType: this.state.heldTileType,
        tileId: this.state.heldTileId,
        boardX: this.state.heldTileColumn,
        boardY: this.state.heldTileRow
      }
    }).then( () => {
      this.setState({
        configuringTile: false,
        confirmDeleteModal: false
      }, this.fetchBoardTiles);
    });
  }

  openConfirmDeleteModal = () => {
    this.setState({
      confirmDeleteModal: true
    });
  }  

  closeConfirmDeleteModal = () => {
    this.setState({
      confirmDeleteModal: false
    });
  }

  openEditModal = () => {
    this.setState({
      editModal: true
    });
  }

  closeEditModal = () => {
    this.setState({
      editModal: false,
      selectedFile: false,
    });
  }

  closeMainModal = () => {
    this.setState({
      configuringTile: false
    })
  }

  closeCreateModal = () => {
    this.setState({
      createModal: false
    });
  }

  openErrorModal = () => {
    this.setState({
      errorModal: true
    })
  }

  closeErrorModal = () => {
    this.setState({
      errorModal: false
    })
  }

  openSwapModal = () => {
    this.setState({
      swapModal: true
    });
    this.fetchBoards();
  }
  closeSwapModal = () => {
    this.setState({
      swapModal: false,
    });
  }
  settingsButtonFunc = () => {
    window.location = '/user-settings?/boards/' + this.props.board_id
  }
  backButtonFunc = () => {
    let user_id = document.getElementById('user-id').textContent;
    if (user_id) {
      window.location = '/home';
    }
    else {
      window.location = '/';
    }
    
  }
  handleEditSubmit = (event) => {
    event.preventDefault()
    const parentType = this.state.folderPath.length === 1
      ? 'boards'
      : 'folders';

    const parentId = this.state.boardStack[this.state.boardStack.length - 1].id;
    const formData = new FormData()
    formData.append("image", event.target.image.files[0])
    formData.append("color", event.target.color.value)
    formData.append("text", event.target.text.value)
    formData.append("tileId", this.state.heldTileId)
    formData.append("tileType", this.state.heldTileType)

    axios({
        method: "post",
        url: `/${parentType}/${parentId}/tile/edit`,
        data: formData,
        headers: {"Content-Type": "multipart/form-data"},
      }).then( () => {
        this.setState({
          configuringTile: false,
          editModal: false,
          selectedFile: false
        }, this.fetchBoardTiles);
      }).catch((error) => {
        const error_message = error.response.data.errors.image == 'undefined' ? 
        error.response.data.errors.image : error.response.data.errors.color
        console.log(error_message)
        this.setState({
          errorModal: true,
          errorMessage: error_message,
        })
      });
    }

  handleCreateSubmit = (event) => {
    event.preventDefault()
    const parentType = this.state.folderPath.length === 1
      ? 'boards'
      : 'folders';

    const parentId = this.state.boardStack[this.state.boardStack.length - 1].id;

    axios.post(`/${parentType}/${parentId}/tiles`, {
      text: event.target.text.value,
      color: event.target.color.value,
      board_x: this.state.heldTileColumn + 1,
      board_y: this.state.heldTileRow + 1
    }).then( () => {
      this.setState({
        configuringTile: false,
        createModal: false
      }, this.fetchBoardTiles);
    }).catch((error) => {
      this.setState({
        errorModal: true,
        errorMessage: error.response.data.errors.color,
      })
    });
  }

  handleImageSubmit = (event) => {
    event.preventDefault()
    this.setState({
      selectedFile: true
    });
  }

  render() {
    const rows = this.renderBoardTiles();
    const paths = this.renderFolderPath();
    const audio_level = document.getElementById("audio-level").innerText/100;
    const user_boards = this.renderBoards(); 
    return (
      <div id="board-container">
        <Modal 
          isOpen={this.state.configuringTile}
          className="main-modal-class"
        >
          <h1 className="general-heading">Configure {this.state.heldTileType}</h1>
            <center>
              <button className="modal-button" onClick={this.openEditModal}>Edit {this.state.heldTileType}</button>
              <button className="modal-button" onClick={this.openConfirmDeleteModal}>Delete {this.state.heldTileType}</button>
              <button className="modal-button" onClick={this.closeMainModal}>Close</button>
            </center>
        </Modal>
        <Modal 
          isOpen={this.state.confirmDeleteModal}
          className="main-modal-class"
        >
          <center>
            <p className="general-heading">Are you sure you want to delete {this.state.heldTileType}? </p>
            <button className="modal-button" onClick={this.handleDeleteTile}> Yes </button>
            <button className="modal-button" onClick={this.closeConfirmDeleteModal}> No </button>
          </center>
        </Modal>
        <Modal
          isOpen={this.state.editModal}
          className="main-modal-class">
          <h1 className="general-heading">Editing {this.state.heldTileType}</h1>
          <form onSubmit={this.handleEditSubmit}>
            <center>
              <input
                name="text"
                type="text"
                placeholder={this.state.heldTileText}
                className="modal-button"
              />
              {/*TODO: make color selection more user friendly */}
                <input
                  name="color"
                  type="text"
                  placeholder={this.state.heldTileColor}
                  className="modal-button"
                />
                <label for='file-input-button' className="file-input">
                {this.state.selectedFile == false ? 'Upload Image' : 'Image Selected'} 
                </label>
                <input 
                  name="image"
                  type="file"
                  placeholder="Image*"
                  id='file-input-button'
                  onChange={this.handleImageSubmit}
                />
                <p>*Images uploaded can be publicly accessed.</p>
              <button type="submit" className="modal-button">Submit</button>
              <button className="modal-button" onClick={this.closeEditModal}>Close</button>
            </center>
          </form>
        </Modal>
        <Modal
          isOpen={this.state.createModal}
          className="main-modal-class">
          <h1 className="general-heading">Create New Word</h1>
            <form onSubmit={this.handleCreateSubmit}>
              <center>
                <input
                  name="text"
                  type="text"
                  placeholder="Text"
                  className="modal-button"
                />
                {/*TODO: make color selection more user friendly */}
                <input
                  name="color"
                  type="text"
                  placeholder="Color (Hexadecimal)"
                  className="modal-button"
                />
                <button type="submit" className="modal-button">Save</button>
                <button className="modal-button" onClick={this.closeCreateModal}>Close</button>
              </center>
            </form>
        </Modal>
        <Modal
          isOpen={this.state.errorModal}
          className="main-modal-class">
            <center>
            <h1 className="general-heading">Error</h1>
            <p>{this.state.errorMessage}</p>
            <button className="modal-button" onClick={this.closeErrorModal}>Close</button>
            </center>
        </Modal>
        <Modal
          isOpen={this.state.swapModal}
          className="swap-modal-class">
          <h1 style={{"color": "black", "textAlign": "center", "borderBottom": "10px solid black"}}>Swap to another board</h1> 
          <form className="swap-button-container">
            {user_boards}
          </form>
          <button className="back-button" onClick={this.closeSwapModal}>Close</button>  
        </Modal>

        <button className="back-button" style={{display: "inline"}}
                onClick={this.backButtonFunc}>
          Exit
        </button>

        <button className="sentence-clear"
                onClick={() => this.setState({sentence: []})}>
          Clear
        </button>
        <button className="sentence-backspace"
                onClick={this.handleBackspaceButtonClick}>
          Backspace
        </button>
        

        <button className="swap-button" onClick={this.openSwapModal}>Swap Boards</button> 
        <button className="settings-button" onClick={this.settingsButtonFunc}>Settings</button>
       
        <div style={{textAlign: "center"}}>
        <table className="folder-path">
        {paths}
        </table>
        <button disabled={ this.userIsOnBaseBoard() }
                className="back-folder-button"
                onClick={this.handleLastFolderButton}>
          Last Folder
        </button>
        <button className="sentence-bar"
                onClick={() => this.handleSpeakButtonClick(Event, audio_level)}>
        <h2>{this.buildSentence()}</h2>
        </button>
        <button className="sentence-speak"
                onClick={() => this.handleSpeakButtonClick(Event, audio_level)}>
          Speak!
        </button>
        </div>
        <br/>
        <WordSuggestions sentence={this.buildSentence() + ' '}
                         addWordToSentence={this.handleWordClick}
        />
        <br/>
        <table className="board-tiles-container"
               style={{"width": "90%", "margin": "auto"}}>
          {rows}
        </table>
      </div>
    );
  }
}
