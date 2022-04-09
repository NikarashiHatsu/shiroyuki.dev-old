import { Link } from "@inertiajs/inertia-react";
import React from "react";

class SmallPost extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            author: this.props.author ?? 'Hatsu Shiroyuki',
            thumbnail: this.props.thumbnail ?? 'https://source.unsplash.com/100x100/',
            title: this.props.title ??  'Lorem ipsum dolor sit amet adipiscing',
            formattedDate: this.props.formattedDate ?? '5 April 2022'
        }
    }

    render() {
        return (
            <Link className="flex group">
                <img src={this.state.thumbnail} className='w-24 h-24 rounded object-cover' />
                <div className="flex flex-col ml-2">
                    <h6 className="transition-colors duration-300 ease-in-out font-semibold line-clamp-2 group-hover:text-primary">{this.state.title}</h6>
                    <p className="text-sm my-1 text-gray-500">{this.state.author}</p>
                    <p className="text-sm text-gray-500">{this.state.formattedDate}</p>
                </div>
            </Link>
        );
    }
}

export default SmallPost;