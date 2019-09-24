import { getBlockTypes, unregisterBlockType } from '@wordpress/blocks';

export class DeregisterCoreBlocks {
  init() {

    const allBlocks = getBlockTypes();

    allBlocks.forEach((block) => {
      if (block.name.startsWith('core') || block.name.startsWith('core-embed')) {
        unregisterBlockType(block.name);
      }
    });
  }
}
