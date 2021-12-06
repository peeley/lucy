require('./bootstrap');

import React from 'react';
import ReactDOM from 'react-dom';
import { Board } from './components/Board.js';

// mounts the React component to the <div id="root"> HTML tag
ReactDOM.render(
  React.createElement(Board, {}),
  document.getElementById('root')
);
