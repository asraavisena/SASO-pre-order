import React, { useState } from 'react';
import Category from './Category';
import Selector from './Selector';

import '../../sass/components/Content.scss';


const Content = () => {
    const {
        categories
    } = window;
    const [currCategory, setCurrCategory] = useState('');

    console.log(categories);
    //load category depends on selected category
    const category = categories.map((cgr) => {
        if (currCategory === "all" || currCategory==="") {
            return(
                <Category
                    key={cgr.id}
                    className="category"
                    category={cgr}
                />
            )
        } else if (currCategory === cgr.slug) {
            return(
                <Category
                    key={cgr.id}
                    className="category"
                    category={cgr}
                />
            )
        }
        return null;
    });
    console.log(currCategory);
    return (
        <div className="content main-content">
            {/** add hero banner */}
            {/** add info page */}
            {/** add select category button */}
            <div className="container-option">
                <label>
                    Pilih Kategori:
                </label>
                <Selector
                    label="category"
                    onChange={(event) => setCurrCategory(event.target.value)}
                    categories={categories}
                />
            </div>
            {category}
            {/** add order or payment info*/}
        </div>
    );
};

export default Content;