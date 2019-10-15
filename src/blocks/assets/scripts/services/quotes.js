/* global themeLocalization */
import { get } from './api';

export async function getQuotes(quotes = 1) {
  const {
    quotesEndpoint,
  } = themeLocalization;

  return get(`${quotesEndpoint}/${quotes}`)
    .then((response) => response);
}

