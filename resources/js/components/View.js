import React, { Component } from "react";

export default class ViewDistrict extends Component {
    constructor(props) {
        super(props);

        this.state = {
            viewDistrict: null
        };
    }

    componentDidMount() {
        let id = this.props.match.params.districtId;
        console.log(id);
        let url = `/api/districts/${id}`;

        fetch(url, {
            headers: {
                Accept: "application/json"
            },
            credentials: "same-origin"
        })
            .then(response => {
                if (!response.ok)
                    throw Error(
                        [response.status, response.statusText].join(" ")
                    );

                return response.json();
            })
            .then(body => {
                this.setState({ viewDistrict: body.data });
            })
            .catch(error => alert(error));
    }

    render() {
        const { viewDistrict } = this.state;

        let content;

        if (!viewDistrict) {
            content = <p>Loading data...</p>;
        } else {
            content = (
                <div>
                    <div className="container">
                        <h1>View District</h1>
                        <h3>{viewDistrict.name}</h3>
                        <p>{viewDistrict.code}</p>
                        <p>{viewDistrict.seat_id}</p>
                        <p>{viewDistrict.seat_name}</p>
                    </div>
                </div>
            );
        }

        return <div className="content-wrapper">{content}</div>;
    }
}
