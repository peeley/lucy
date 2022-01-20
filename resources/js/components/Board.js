import React from 'react';

export class Board extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      currentBoard: [[]],
      boardStack: [],
      sentence: [],
      loading: true,
      folderPath: []
    };
  }

  componentDidMount = () => {
    axios.get(`/boards/${this.props.board_id}/tiles`)
      .then( response => {
        this.setState({
          currentBoard: response.data.contents,
          boardStack: [response.data.contents],
          loading: false
        });
      });
  }

  handleFolderClick = (folderContents, folderName) => {
    console.log('folder contents:', folderContents);
    this.setState( state => ({
      currentBoard: folderContents,
      boardStack: [...state.boardStack, folderContents],
      folderPath: [...state.folderPath, folderName]
    }));
  }

  handleGoBackFunction = () => {
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

    return this.state.currentBoard.map( row =>
      <tr>
      { row.map( tile =>
        <td style={{"background-color": `${tile.color}`}}
            className="default-tile"
            onClick={tile.contents
                     ? () => this.handleFolderClick(tile.contents, tile.name)
                     : () => this.handleWordClick(tile.text)}>
          {(tile.text ?? tile.name) + ' '}
        </td>
      )}
      </tr>
    );
  }

  renderFolderPath = () => {    
    return this.state.folderPath.map(folder =>
      <span>{folder} {'>'}</span>
      );
  }

  render() {
    const rows = this.renderBoardTiles();
    const paths = this.renderFolderPath();
    //TODO: instead of root, get the folder name assigned by the user.
    return (
      <div id="board-container">
        <button className="back-folder-button" onClick={this.handleGoBackFunction}>Last Folder</button>
        <button className="sentence-backspace" onClick={this.handleBackspaceButtonClick}>Backspace</button>
        <button className="sentence-clear" onClick={() => this.setState({sentence: []})}>Clear</button>
        <button className="sentence-speak" onClick={this.handleSpeakButtonClick}>Speak!</button>
        <br/>
        <p className="folder-path"> Current Path: root {'>'} </p> {paths}
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
