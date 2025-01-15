import sassGlobImports from 'vite-plugin-sass-glob-import';
import { ImageValidationPlugin } from '../plugins/image-validation.js';

const IMAGE_SIZE_LIMIT = 1024;

export const plugins = [
    sassGlobImports(),
    ImageValidationPlugin("dist", IMAGE_SIZE_LIMIT),
];