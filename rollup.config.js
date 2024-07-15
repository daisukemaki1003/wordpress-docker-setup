import resolve from '@rollup/plugin-node-resolve';

import alias from '@rollup/plugin-alias';
import commonjs from '@rollup/plugin-commonjs';
import esbuild from 'rollup-plugin-esbuild';
import replace from '@rollup/plugin-replace';


const aliasSetting = {
    entries: [
        {
            find: 'animejs',
            replacement: 'animejs/lib/anime.es.js',
        },
    ],
};

export const deploy = {
    input: './theme/js/app.ts',
    output: {
        file: './dist/js/bundle.js',
        format: 'esm',
    },
    plugins: [
        alias(aliasSetting),
        esbuild({
            minify: process.env.NODE_ENV === 'production',
        }),
        resolve({
            browser: true,
        }),
        commonjs(),
        replace({
            preventAssignment: true,
            'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV),
        }),
    ],
};

export default deploy;
