import React from "react"
import { CheckCircle } from 'phosphor-react';

export default function Alert(props) {
    const { type, message } = props;

    return (
        <div className={`mt-4 flex justify-start alert alert-${type}`}>
            <CheckCircle size={16} />
            <span>
                {message}
            </span>
        </div>
    );
}