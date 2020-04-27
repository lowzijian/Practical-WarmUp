import React, { Component } from "react";

export default class District extends Component {
    constructor(props) {
        super(props);

        this.state = {
            districts: null
        };
        this.viewDistrict = this.viewDistrict.bind(this);
    }

    componentDidMount() {
        let url = "/api/districts";

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
                this.setState({
                    districts: body.data
                });
            })
            .catch(error => alert(error));
    }

    viewDistrict(id) {
        this.props.history.push(`/districts/${id}`);
    }

    render() {
        const { districts } = this.state;

        let content;

        if (!districts) {
            content = <p>Loading data...</p>;
        } else if (districts.length == 0) {
            content = <p>No districts in record</p>;
        } else {
            let items = districts.map(district => (
                <tr key={district.id}>
                    <td>{district.code}</td>
                    <td>{district.name}</td>
                    <td>{district.seat_id}</td>
                    <td>{district.seat_name}</td>
                    <td>
                        <button
                            type="button"
                            onClick={() => this.viewDistrict(district.id)}
                        >
                            View More
                        </button>
                    </td>
                </tr>
            ));

            content = (
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Seat Id</th>
                                <th>Seat Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>{items}</tbody>
                    </table>
                </div>
            );
        }

        return <div className="content-wrapper">{content}</div>;
    }
}
