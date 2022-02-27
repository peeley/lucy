import React from 'react';
import Modal from 'react-modal';

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
      heldTileColumn: null,
      heldTileRow: null
    };
  }

  componentDidMount = () => {
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


  handleSpeakButtonClick = () => {
    // TODO set TTS voice according to user settings
    let synth = window.speechSynthesis;
    let utterance = new SpeechSynthesisUtterance(this.buildSentence());
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
        const tileType = tile.contents ? 'folder' : 'word';
        
        return <td style={{ backgroundColor: `${tile.color}`}}
            className="default-tile"
            onClick={tile.contents
                     ? () => this.handleFolderClick(tile, tile.name)
                     : () => this.handleWordClick(tile.text)}
            onMouseDown={() => this._onHoldStart(tileType, parent.id, tile.id, columnIndex, rowIndex)}
            onTouchStart={() => this._onHoldStart(tileType, parent.id, tile.id, columnIndex, rowIndex)}
            onMouseUp={this._onHoldEnd}
            onMouseOut={() => { // FIXME for drag and drop
            }}
            onTouchEnd={this._onHoldEnd}
            onTouchCancel={this._onHoldEnd}
        >
          {(tile.text ?? tile.name) + ' '}
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

  _onHoldStart = (tileType, tileId, tileX, tileY) => {
      if (this.props.board_id === 1) {
        //return;
      }

      this.setState({
        isHoldingTile: true,
        activeHoldTimeoutID: setTimeout(() => {
            if (this.state.isHoldingTile) {
              this.setState({
                configuringTile: true,
                heldTileId: tileId,
                heldTileType: tileType,
                heldTileRow: tileY,
                heldTileColumn: tileX
              });
            }
          }, 1000),
        });
      ;
    }

  _onHoldEnd = () => {
    if (this.props.board_id === 1) {
      //return;
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

    axios.delete(`/${parentType}/${parentId}/tile/delete`,
      {
        tileType: this.state.heldTileType,
        boardX: this.state.heldTileColumn,
        boardY: this.state.heldTileRow
      }
    ).then( response => {
      this.setState({
        configuringTile: false
      });
    });

    // TODO handle error response from backend
  }

  render() {
    const rows = this.renderBoardTiles();
    const paths = this.renderFolderPath();
    //TODO: instead of root, get the folder name assigned by the user.
    return (
      <div id="board-container">
        <Modal 
          isOpen={this.state.configuringTile}
          className="edit-modal"
        >
          <h1>Configure {this.state.heldTileType}</h1>
          { this.state.chosenToEditTile ?
            <h1>Editing the tile</h1>
           : <>
              <button onClick={this.handleEditTile}>Edit {this.state.heldTileType}</button>
              <button onClick={this.handleDeleteTile}>Delete {this.state.heldTileType}</button>
            </>
        }
        </Modal>
        <button disabled={ this.userIsOnBaseBoard() }
                className="back-folder-button"
                onClick={this.handleLastFolderButton}>
          Last Folder
        </button>
        <button className="sentence-backspace"
                onClick={this.handleBackspaceButtonClick}>
          Backspace
        </button>
        <button className="sentence-clear"
                onClick={() => this.setState({sentence: []})}>
          Clear
        </button>
        <button className="sentence-speak"
                onClick={this.handleSpeakButtonClick}>
          Speak!
        </button>
        <br/>
        <table className="folder-path">
        {paths}
        </table>
        <h1 className="sentence-bar">{this.buildSentence()}</h1>
        <br/>
        <table className="board-tiles-container"
               style={{"width": "90%", "margin": "auto"}}>
          {rows}
        </table>
      </div>
    );
  }
}
