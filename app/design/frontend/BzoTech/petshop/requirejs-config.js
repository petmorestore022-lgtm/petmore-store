var config = {
    map: {
        '*': {
            'bootstrap.bundle.min': 'js/bootstrap/bootstrap.bundle.min',
            'wowJs': 'js/wow',
        }
    },
    shim: {
        'bootstrap.bundle.min': {
            'deps': ['jquery']
        },
        'wowJs': {
            'deps': ['jquery']
        },
    },
    deps: [
        "js/bootstrap/bootstrap.bundle.min",
        "js/wow",
        "js/wowTheme",
        "js/theme-js"
    ]
};