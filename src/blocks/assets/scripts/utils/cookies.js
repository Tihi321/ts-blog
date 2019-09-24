export function setCookie(key, value, daysProp) {

  // Default at 365 days.
  const days = daysProp || 365;

  const date = new Date(Date.now() + (days * 86400000));

  document.cookie = `${key}=${value}; expires=${date.toGMTString()}; path=/`;
}

function cookieExist(key) {
  return (document.cookie.split(';').filter((item) => item.split('=')[0].trim() === key).length > 0);
}

export const getCookie = (key) => {
  if (cookieExist(key)) {
    return document.cookie.split(';').filter((item) => item.split('=')[0].trim() === key)[0].split('=')[1];
  }

  return '';
};
