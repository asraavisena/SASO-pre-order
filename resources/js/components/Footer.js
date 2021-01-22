import React from 'react';
import LadiLogo from '../UI/images/Ladi.png';
import Facebook from '../UI/images/Facebook.svg';
import Instagram from '../UI/images/Instagram.svg';
import Youtube from '../UI/images/Youtube.svg';

import '../../sass/components/Footer.scss';

const Footer = () => {
    return (
        <div className="footer">
            <div className="footer-top">
                <div className="content">
                    <div className="informations">
                        <div className="title">
                            Support Our Masjid
                        </div>
                        <br/>
                        <div className="address">
                            indonesischer Weisheits- & Kulturzentrum e.V. <br/>
                            Feldzeugmeister. 1<br/>
                            10557 Berlin
                        </div>
                        <br/>
                        <div className="bank-account">
                            Phone : +49 30 6792 7147<br/>
                            Fax. : +49 30 6792 7147<br/>
                            Email : info@iwkz.de<br/>
                            Konto Nr. : 346669106<br/>
                            BLZ : 1001 0010, Post Bank Berlin
                        </div>
                    </div>
                    <div className="ladi-img">
                        <img src={LadiLogo}></img>
                    </div>
                </div>
            </div>
            <div className="footer-bottom">
                <div className="content">
                    <div className="copyright">
                        © 2020 IWKZ.
                    </div>
                    <div className="media-social-wrapper">
                        <a
                            href="https://www.facebook.com/IWKZ.Berlin"
                            className="footer-facebook"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img src={Facebook}></img>
                        </a>
                        <a
                            href="https://www.instagram.com/iwkzalfalah/"
                            className="footer-instagram"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img src={Instagram}></img>
                        </a>
                        <a
                            href="https://www.youtube.com/user/alfalahberlin"
                            className="footer-youtube"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img src={Youtube}></img>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Footer;