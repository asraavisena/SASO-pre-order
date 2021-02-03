import React from 'react';

import './Button.scss'

const Button = (props) => {
    const {
        className,
        type,
        text,
        onClick,
        disabled
    } = props;
    return (
        <button
            className={["button ", className].join('')}
            type={type}
            onClick={onClick}
            disabled={disabled}
        >
            {text}
        </button>
    );
};

export default Button;