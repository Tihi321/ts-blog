import React, { useState } from 'react';

const App = (props) => {
  const {
    className,
  } = props;

  const [open, setOpen] = useState(false);

  return (
    <div className={`${className}__search`}>
      <div className={`${className}__form`}>
        header
      </div>
    </div>
  );
};

export default App;
