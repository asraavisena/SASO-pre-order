import React from 'react';
import '../../sass/components/Selector.scss'

const Selector = (props) => {
    const {
        categories,
        label,
        onChange,
    } = props;
    const options = categories.map((cgr) => (
        <option
            key={['option-', cgr.id].join('')}
            value={cgr.slug}
        >
            {cgr.name}
        </option>
    ))
    return (
        <select
            id={['selector-', label].join('')}
            className="selector"
            onChange={onChange}
        >
            <option key="option-all" value="all">Semua</option> 
            {options}
        </select>
    );
};

export default Selector;