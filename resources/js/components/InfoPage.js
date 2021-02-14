import React, { useState } from 'react';

import '../../sass/components/InfoPage.scss'

const InfoPage = () => {
    
    const [isShrinked, setIsShrinked] = useState(true);
    const width = screen.width;
    let desc = "SaSo (Sate Somay) adalah acara tahunan IWKZ yang dilakasanakan dalam rangka penggalangan dana untuk memenuhi kebutuhan operasional masjid";

    function expand() {
        setIsShrinked(false)
    }

    return (
        <div className="info-page">
            <img className="img" src="/storage/images/Bz8yZZ3jgNWtd1uE2uWk2z2t74hZW9ODLyWnhYVb.jpg"></img>
            <div className="info">
                <h1 className="title">SaSo 2021</h1>
                <span className="desc">{width < 400 && isShrinked ? desc.substring(0, 25) + "..." : desc}</span>
                <p className="expand" onClick={expand} style={{visibility: width < 400 && isShrinked ? 'visible' : 'collapse'}}>selengkapnya</p>
            </div>
            <div className="order">
                <a href="#order"><button className="btn btn-warning order-link">Pesan Sekarang</button></a>
            </div>
        </div>
    );
};

export default InfoPage;