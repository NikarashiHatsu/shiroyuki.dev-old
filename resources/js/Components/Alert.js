import React from "react"
import { CheckCircle, XCircle } from 'phosphor-react';

export default function Alert(props) {
    const { type, message } = props;
    const alertName = type == 'success'
        ? 'alert-success'
        : 'alert-error';
    const alertIcon = type == 'success'
        ? <CheckCircle className="flex-none" size={20} />
        : <XCircle className="flex-none" size={20} />

    return (
        <div className={`mb-4 flex justify-start alert ${alertName}`}>
            {alertIcon}
            <span className="flex-1">
                {message}
            </span>
        </div>
    );
}