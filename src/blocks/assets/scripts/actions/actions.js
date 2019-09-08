const ucfirst = (str) => {
  return str.charAt(0).toUpperCase() + str.slice(1);
};

const multiplePropsActions = (setAttributes, attributes, key, propsAttributes) => {
  const output = {};

  // Set output as a object key with anonimus function callback.
  for (const propType in attributes[key]) {

    // Create functions for default values.
    if (propType === 'default') {

      for (const propName in attributes[key][propType]) {
        if (attributes[key][propType].hasOwnProperty(propName)) {

          output[`onChange${ucfirst(key)}${ucfirst(propName)}`] = function(value) {
            setAttributes({
              [key]: {
                ...propsAttributes[key],
                [propName]: value,
              },
            });
          };

        }
      }
    }
  }

  return output;
};

const siglePropsAction = (setAttributes, key) => {
  const output = {};

  // Set output as a object key with anonimus function callback.
  // Keys first name must be uppercased.
  output[`onChange${ucfirst(key)}`] = function(value) {
    setAttributes({
      [key]: value,
    });
  };

  return output;
};

const mediaPropsAction = (setAttributes, key) => {
  const output = {};

  // Set output as a object key with anonimus function callback.
  // Keys first name must be uppercased.
  output[`onChange${ucfirst(key)}`] = function(value) {
    setAttributes({
      [key]: {
        id: value.id,
        url: value.url,
        title: value.title,
      },
    });
  };

  return output;
};

export const getAllActions = (props, manifest) => {

  // Prepare output variable.
  let actionsOutput = {};

  const { setAttributes, attributes: propsAttributes } = props || {};
  const { attributes } = manifest || {};

  // Iterate all object keys. This is the fastest way.
  for (const key in attributes) {

    // If key doesn't exists skip this iteration.
    if (attributes.hasOwnProperty(key)) {


      // If manualAction key present skip action creation.
      if (attributes[key].hasOwnProperty('manualAction')) {
        continue;
      }
  
      // If multipleProps key not present skip action creation.
      if (attributes[key].hasOwnProperty('multipleProps')) {
        actionsOutput = { ...actionsOutput, ...multiplePropsActions(setAttributes, attributes, key, propsAttributes) };
      } else if (attributes[key].hasOwnProperty('mediaAction')) {
        actionsOutput = { ...actionsOutput, ...mediaPropsAction(setAttributes, key) };
      } else {
        actionsOutput = { ...actionsOutput, ...siglePropsAction(setAttributes, key) };
      }
    }
  }

  return actionsOutput;
};
