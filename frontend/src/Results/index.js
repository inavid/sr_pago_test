import React from 'react';
import { Table } from 'reactstrap';

class Results extends React.Component {
  render() {
    return (
        (this.props.infoGasolinas.length > 0) ?
            <Table responsive hover>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Calle</th>
                    <th>RFC</th>
                    <th>Precio regular</th>
                    <th>Precio premium</th>
                    <th>Permiso</th>
                </tr>
                </thead>
                <tbody>
                {
                    this.props.infoGasolinas.map((row)=> {
                        return (
                            <tr key={row._id}>
                                <th scope="row">{row._id}</th>
                                <td>{row.calle}</td>
                                <td>{row.rfc}</td>
                                <td>{"$ "+row.regular}</td>
                                <td>{"$ "+row.premium}</td>
                                <td>{row.numeropermiso}</td>
                            </tr>
                        )
                    })
                }
                </tbody>
            </Table>
        : null
    );
  }
}

export default Results;