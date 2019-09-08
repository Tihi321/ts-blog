/* global themeLocalization */
import { get } from './api';

export async function getHeader(menuPosition = 'main-nav') {
  const {
    headerEndpoint,
  } = themeLocalization;

  return get(`${headerEndpoint}/${menuPosition}`)
    .then((response) => response);
}

