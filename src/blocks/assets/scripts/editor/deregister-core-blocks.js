import { getBlockTypes, unregisterBlockType } from '@wordpress/blocks';

export class DeregisterCoreBlocks {
  init() {

    const allBlocks = getBlockTypes();

    allBlocks.forEach((block) => {
      const prefix = block.name.split('/')[0];
      if (prefix === 'core' || prefix === 'core-embed') {
        unregisterBlockType(block.name);
      }
    });
  }
}
