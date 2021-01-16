import React from 'react';
import Category from '../components/Category'

import '../../sass/components/Content.scss';


const Content = () => {
    const {
        menus,
        categories
    } = window;
    console.log(categories);
    //load category
    const category = categories.map((cgr) =>
        <Category
            key={cgr.id}
            className="category"
            category={cgr}
            menus={menus}
        />
    );
    return (
        <div className="content">
            {/** add hero banner */}
            {/** add info page */}
            {/** add select category button */}
            {category}
            {/** add order or payment info*/}
        </div>
    );
};

export default Content;