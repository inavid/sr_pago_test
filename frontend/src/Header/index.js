import React from 'react';
import './header.css';
import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
  Nav
} from 'reactstrap';

class Header extends React.Component {
  constructor(props) {
    super(props);

    this.toggle = this.toggle.bind(this);
    this.state = {
      isOpen: false
    };
  }
  toggle() {
    this.setState({
      isOpen: !this.state.isOpen
    });
  }
  render() {
    return (
        <Navbar color="dark" expand="md" className={"header"}>
          <NavbarBrand 
            href="/" 
            className={"header-title"}
          >
            Sr. Pago
          </NavbarBrand>
          <NavbarToggler onClick={this.toggle} />
          <Collapse isOpen={this.state.isOpen} navbar>
            <Nav className="ml-auto" navbar>
            </Nav>
          </Collapse>
        </Navbar>
    );
  }
}

export default Header;