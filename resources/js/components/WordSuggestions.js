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
      this.setState({ suggestedWords: [] });
      return [];
    }

    return axios.get(`https://api.imagineville.org/word/predict/next/future?left=${sentence}`)
      .then( response => {
        this.setState({
          suggestedWords: response.data.futures.map( future => future.next )
        });
      }).catch( _ => [] );
  }

  handleWordClick = (word) => {
    this.props.addWordToSentence(word);
  }

  render() {
    let suggestedWordElements = this.state.suggestedWords.map( (word, index) =>
      <span className="suggested-word"
            key={index}
            onClick={() => this.handleWordClick(word)}>
        {word}
      </span>
    );

    return (
      <div id="word-suggestion-bar">
        { suggestedWordElements }
      </div>
    );
  }
}
