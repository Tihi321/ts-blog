import { domReady } from '../../../../../skin/assets/scripts/utils/dom';
import { DeregisterCoreBlocks } from './deregister-core-blocks';

domReady(() => {

  // deregister core blocks.
  const deregisterBlocks = new DeregisterCoreBlocks();
  deregisterBlocks.init();

});
