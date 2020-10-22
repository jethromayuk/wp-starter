module.exports = {
    plugins: ['stylelint-scss'],
    rules: {
        "block-no-empty": null,
        "color-no-invalid-hex": [
            true,
            {
                "message": "Invalid hex codes are not allowed"
            }
        ],
        "color-hex-case": [
            "lower",
            {
                "message": "Lowercase letters are easier to distinguish from numbers"
            }
        ],
        "comment-no-empty": true,
        "declaration-colon-space-after": "always",
        "font-family-no-missing-generic-family-keyword": true,
        "max-empty-lines": [
            2,
            {
                "message": "Please ensure that there is a maximum of 2 empty lines."
            }
        ],
        "no-extra-semicolons": true,
        "scss/selector-no-redundant-nesting-selector": true,
        "unit-whitelist": ["em", "rem", "%", "px", "vw", "vh", "s"]
    }
}
