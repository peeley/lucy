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

  componentDidMount() {
    axios.get('/boards/1').then( response => {
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
    let utterance = new SpeechSynthesisUtterance(this.state.sentence.join(' '));
    synth.speak(utterance);
  }

  render() {
    const rows = this.state.currentBoard.map( row =>
      <p>
      { row.map( tile =>
        <span style={{"background-color": `#${tile.color}`}} onClick={tile.type === 'folder' ? () => this.handleFolderClick(tile.contents) : () => this.handleWordClick(tile.text)}>{tile.text + ' '}</span>
      )}
      </p>
    );

    return (
      <div id="board-container">
        <button onClick={this.handleGoBackFunction}>Go Back</button>
        <button onClick={this.handleBackspaceButtonClick}>Backspace</button>
        <button onClick={this.handleSpeakButtonClick}>Speak!</button>
        <br/>
        <h1>{this.state.sentence.join(' ')}</h1>
        <br/>
        <div>{rows}</div>
      </div>
    );
  }
}
