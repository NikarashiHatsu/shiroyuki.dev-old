import React from "react";

class SmallPost extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            author: 'Hatsu Shiroyuki',
            thumbnail: 'https://source.unsplash.com/100x100/',
            title: 'Lorem ipsum dolor sit amet adipiscing',
            formattedDate: '5 April 2022'
        }
    }

    render() {
        return (
            <div className="flex mt-4">
                <img src={this.state.thumbnail} className='w-24 h-24 rounded object-cover' />
                <div className="flex flex-col ml-2">
                    <h6 className="font-semibold">{this.state.title}</h6>
                    <p>{this.state.author}</p>
                    <p className="text-sm text-">{this.state.formattedDate}</p>
                </div>
            </div>
        );
    }
}

export default SmallPost;