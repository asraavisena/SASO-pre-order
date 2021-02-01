import React from 'react';
import Menu from './Menu';

import '../../sass/components/Menus.scss'

const Menus = (props) => {
    const {
        category,
    } = props;

    const menu = category.menus.map((menu, i) =>
            <Menu
                key={menu.id}
                menu={menu}
            />
    );
    const noMenuMessage = (
        <span>
            Maaf, menu tidak tersedia. 
            <br />
            Silahkan hubungi Contact Person (CP) 
            yang tersedia untuk informasi lebih lanjut.
        </span>    
    )
    const noMenusExist = category.menus.length == 0;
    return (
        <div className="menus">
            {
                noMenusExist ? noMenuMessage : menu
            }
        </div>
    );
};

export default Menus;