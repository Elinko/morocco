const path = require('path');

module.exports = {
    plugins: {
        'postcss-extract-media-query': {
            output: {
                path: path.join(__dirname, 'public/dist/css/'),
                name: '[name]-[query].[ext]'
            },
            queries: {
              '(min-width:576px)': 'min-mobile',
              '(min-width:768px)' : 'min-tablet',  
              '(min-width:992px)': 'min-desktop',
              '(min-width:768px) and (min-width:992px)' : 'min-desktop',
              '(min-width:1200px)': 'min-large',
              //'(max-width:575.98px)': 'max-mobile',
              //'(max-width:767.98px)': 'max-tablet',
              //'(max-width:991.98px)': 'max-desktop',
              //'(max-width:1199.98px)': 'max-large'
            },
            whitelist: true,
            stats: false
        }
    }
};