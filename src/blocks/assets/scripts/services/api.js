/* global themeLocalization */

export function get(model) {
  const {
    restUrl,
    nonce,
  } = themeLocalization;
  return fetch(`${restUrl}${model}`, {
    method: 'GET',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
      'X-WP-Nonce': nonce,
    },
  }).then((res) => res.json());
}
