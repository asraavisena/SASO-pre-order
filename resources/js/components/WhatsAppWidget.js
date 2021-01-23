import React from 'react';
import WhatsApp from '../UI/images/WhatsApp.svg';

import '../../sass/components/WhatsAppWidget.scss';

const WhatsAppWidget = (props) => {
    let {
        phoneNumber
    } = props;
    phoneNumber = (phoneNumber === "") ? "4915223122739" : phoneNumber;
    return (
        <a
            href={['https://wa.me/', phoneNumber].join('')}
            className="whatsapp-widget"
            target="_blank"
            rel="noopener noreferrer"
        >
            <img
                src={WhatsApp}
                className="whatsapp-logo"
            ></img>
        </a>
    );
};

export default WhatsAppWidget;