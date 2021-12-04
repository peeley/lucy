require('./bootstrap');
import { Board } from './components/Board.js';

import React from 'react';
import ReactDOM from 'react-dom';

ReactDOM.render(
  React.createElement(Board, {}),
  document.getElementById('root')
);
