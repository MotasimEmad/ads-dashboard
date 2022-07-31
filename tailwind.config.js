module.exports = {
    purge: [],
    theme: {
        fontFamily: {
            'base': 'Inter',
            // 'base-ar': 'Tajawal' // I love this font for arabic
        },
        extend: {
            fontFamily: {
                'Quicksand': ['Quicksand']
              },
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/forms')({
            strategy: 'class',
        }),
    ],
};
