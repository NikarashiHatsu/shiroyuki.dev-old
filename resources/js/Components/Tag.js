import { Link } from "@inertiajs/inertia-react";
import React from "react";

class Tag extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            tag: props.tag,
        }
    }

    render() {
        return (
            <Link className="transition duration-300 ease-in-out inline-block border border-primary px-3 py-2 rounded-lg mr-2 mb-2 hover:bg-primary hover:text-white">
                {this.state.tag}
            </Link>
        )
    }
}

export default Tag;