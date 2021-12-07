import React from 'react';

export class Board extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      currentBoard: [[]],
      boardStack: [],
      sentence: []
    };
  }

  componentDidMount = () => {
    axios.get(`/boards/${this.props.board_id}/tiles`)
      .then( response => {
        this.setState({
          currentBoard: response.data,
          boardStack: [response.data]
        });
      });
  }

  handleFolderClick = (folderContents) => {
    this.setState( state => ({
      currentBoard: folderContents,
      boardStack: [...state.boardStack, folderContents]
    }));
  }

  handleGoBackFunction = () => {
    this.setState(state => ({
      boardStack: state.boardStack.slice(0, -1),
      currentBoard: state.boardStack[state.boardStack.length - 2]
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

  render() {
    const rows = this.state.currentBoard.map( row =>
      <tr>
      { row.map( tile =>
        <td style={{"background-color": `#${tile.color}`}}
            className="board-tile"
            onClick={tile.type === 'folder'
                     ? () => this.handleFolderClick(tile.contents)
                     : () => this.handleWordClick(tile.text)}>
          {tile.text + ' '}
        </td>
      )}
      </tr>
    );

    return (
      <div id="board-container">
        <button onClick={this.handleGoBackFunction}>Last Folder</button>
        <button onClick={this.handleBackspaceButtonClick}>Backspace</button>
        <button onClick={() => this.setState({sentence: []})}>Clear</button>
        <button onClick={this.handleSpeakButtonClick}>Speak!</button>
        <br/>
        <h1>{this.buildSentence()}</h1>
        <br/>
        <table className="board-tiles-container"
              style={{"width": "90%", "margin": "auto"}}>
          {rows}
        </table>
      </div>
    );
  }
}
