import { Link } from "@inertiajs/inertia-react";
import React from "react";

class Post extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            author: this.props.author,
            thumbnail: this.props.thumbnail,
            title: this.props.title,
            description: this.props.description,
            formattedDate: this.props.formattedDate,
        }
    }

    render() {
        return (
            <Link className="flex flex-col group border rounded">
                <div className="aspect-w-16 aspect-h-10">
                    <img src={this.state.thumbnail} className='w-full h-full rounded-t' />
                </div>
                <div className="flex flex-col p-4">
                    <h6 className="transition-colors duration-300 ease-in-out font-semibold line-clamp-2 group-hover:text-primary">
                        {this.state.title}
                    </h6>
                    <div className="flex items-center text-sm my-1 text-gray-500">
                        <span>
                            {this.state.author}
                        </span>
                        <div className="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
                        <span>
                            {this.state.formattedDate}
                        </span>
                    </div>
                    <p className="text-sm my-1 line-clamp-3 leading-normal">
                        {this.state.description}
                    </p>
                </div>
            </Link>
        );
    }
}

export default Post;