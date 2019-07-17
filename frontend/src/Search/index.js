import React from 'react';
import './search.css';
import { Col, Form, FormGroup, Label, Input, Button } from 'reactstrap';

class Search extends React.Component {
  state = {
    state_selected: "",
    states: [],
    municipio_selected: "",
    municipios: [],
    postal_code_selected: "",
    postalCodes: [],
    submitable: false
  }
  
  async componentDidMount() {
    await fetch('http://localhost/api/sepomex?group=state')
      .then(res => res.json())
      .then((data) => {
        this.setState({
          state_selected: data[0].c_estado,
          states: data 
        })
      })
      .catch(console.log)
  }

  handleChange = (event) => {
    let state_selected = this.state.states.filter((row)=>{
      return event.target.value === row.d_estado
    });
    state_selected = state_selected[0];
    this.setState({state_selected: state_selected.id}, function () {
      this.loadMunicipios();
    });
  }

  loadMunicipios = () => {
      fetch(`http://localhost/api/sepomex/municipios/${this.state.state_selected}`)
      .then(res => res.json())
      .then((data) => {
        this.setState({
          municipio_selected: data[0].id,
          municipios: data 
        })
      })
      .catch(console.log)
  }

  handleMunicipiosChange = (event) => {
    let municipio_selected = this.state.municipios.filter((row)=>{
      return event.target.value === row.D_mnpio
    });
    municipio_selected = municipio_selected[0];
    this.setState({municipio_selected: municipio_selected.id}, function () {
      this.loadPostalCodes();
    });
  }

  loadPostalCodes = () => {
    fetch(`http://localhost/api/sepomex/postalCodes/${this.state.municipio_selected}`)
    .then(res => res.json())
    .then((data) => {
      this.setState({
        postal_code_selected: data[0].id,
        postalCodes: data 
      })
    })
    .catch(console.log)
  }

  handlePostalChange = (event) => {
    let postal_code_selected = this.state.postalCodes.filter((row)=>{
      return event.target.value === row.d_codigo
    });
    postal_code_selected = postal_code_selected[0];
    this.setState({
      postal_code_selected: postal_code_selected.d_codigo,
    });
  }
  
  render() {
    return (
      <Form className={"formulary"}>
        <FormGroup row>
          <Label for="estado" sm={2}>Estado</Label>
          <Col sm={10}>
            <Input type="select" name="estado" id="estado" onChange={this.handleChange}>
            {
              (this.state.states) ?
                this.state.states.map((state) => {
                  return <option 
                            id={state.c_estado}
                            key={state.c_estado}
                          >{state.d_estado}</option>
                })
              : null
            }
            </Input>
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="municipio" sm={2}>Municipio</Label>
          <Col sm={10}>
            <Input type="select" name="municipio" id="municipio" onChange={this.handleMunicipiosChange}>
            {
              (this.state.municipios) ?
                this.state.municipios.map((municipio) => {
                  return <option 
                            id={municipio.id}
                            key={municipio.id}
                          >{municipio.D_mnpio}</option>
                })
              : null
            }
            </Input>
          </Col>
        </FormGroup>
        <FormGroup row>
          <Label for="postalCode" sm={2}>Código Postal</Label>
          <Col sm={10}>
            <Input type="select" name="postalCode" id="postalCode" onChange={this.handlePostalChange}>
            {
              (this.state.postalCodes) ?
                this.state.postalCodes.map((postalCode) => {
                  return <option 
                            id={postalCode.id}
                            key={postalCode.id}
                          >{postalCode.d_codigo}</option>
                })
              : null
            }
            </Input>
          </Col>
        </FormGroup>
        <Button 
          color="secondary" 
          size="lg" 
          block
          onClick={()=>{this.props.onClickSubmitButton(this.state.postal_code_selected)}}
        >
          Search
        </Button>
      </Form>
    );
  }
}

export default Search;