require('./bootstrap');

import React from 'react';
import ReactDOM from 'react-dom';
import { Board } from './components/Board.js';

// mount the React app to the <div id="root"> tag
let rootElement = document.getElementById('root');

ReactDOM.render(
  <Board board_id={rootElement.getAttribute('board_id')}/>,
  rootElement
);
