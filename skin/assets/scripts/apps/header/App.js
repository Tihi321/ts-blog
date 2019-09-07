import React from 'react';
import { useAsync } from 'react-use';
import { getHeader } from '../../services/header';
import Navbar from './Components/Navbar';

const App = (props) => {
  const {
    accentColor,
    className,
  } = props;

  const data = useAsync(getHeader);

  return (
    <div className={`${className}__header`}>
      {data.loading && <div>Loading</div>}
      {!data.loading && <Navbar {...data.value} accentColor={accentColor} />}
    </div>
  );
};

export default App;
