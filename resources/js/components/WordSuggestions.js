import React from 'react';

export default class WordSuggestiosn extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      suggestedWords: []
    };
  }

  componentDidUpdate(prevProps) {
    if (this.props.sentence !== prevProps.sentence) {
      this.fetchWordSuggestions(this.props.sentence);
    }
  }

  fetchWordSuggestions = (sentence) => {
    if (!sentence || sentence == ' ') {
      return [];
    }

    return axios.get(`https://api.imagineville.org/word/predict/next/future?left=${sentence}`)
      .then( response => {
        console.log(response);
        this.setState({
          suggestedWords: response.data.futures.map( future => future.next )
        });
      }).catch( _ => [] );
  }

  handleWordClick = (word) => {
    this.props.addWordToSentence(word);
  }

  render() {
    let suggestedWordElements = this.state.suggestedWords.map( word =>
      <span onClick={() => this.handleWordClick(word)}>{word}</span>
    );

    return (
      <div style={{display: 'flex', justifyContent: 'space-around'}}>
        { suggestedWordElements }
      </div>
    );
  }
}
