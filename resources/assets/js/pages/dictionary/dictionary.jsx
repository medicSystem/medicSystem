import React, { Component } from "react"
import axios from "axios"
import Content from "../../components/content/content"
import {Tab, Tabs, Thumbnail} from "react-bootstrap"
import "./dictionary.css"
import PropTypes from "prop-types"


export default class Dictionary extends Component {
    constructor(props) {
        super(props)
        this.handleSelect = this.handleSelect.bind(this)
        this.state = {
            loading: true,
            key: 0
        }
    }

    componentDidMount() {
        axios
            .get("/api/dictionary/infections")
            .then(response => {
                this.setState({
                    loading: false,
                    dictionary: response.data
                })
            })
    }

    getData() {
        let id = ""
        switch (this.state.key) {
        case 0: id="infections"
            break

        case 1: id="degenerative"
            break

        case 2: id="deficiency"
            break

        case 3: id="non-infectious"
            break

        case 4: id="social"
            break

        case 5: id="mental"
            break
        default: id=""
        }
        axios
            .get(`/api/dictionary/${id}`)
            .then(response => {
                this.setState({
                    loading: false,
                    dictionary: response.data
                })
            })
    }
    handleSelect(key) {
        this.setState({ key: key }, () => {
            this.getData()
        })


    }


    render() {
        const { dictionary, loading } = this.state
        const categories = [
            "Infections",
            "Degenerative",
            "Deficiency",
            "Non-Infectious",
            "Social",
            "Mental"
        ]
        if (loading) {
            return null
        }
        return (
            <Content>
                <Tabs
                    id="categories"
                    activeKey={this.state.key}
                    onSelect={this.handleSelect}
                >
                    {categories.map((category, index) => (
                        <Tab key={index} eventKey={index} title={category}>
                            {dictionary.map(dictionary => (
                                <div key={dictionary.id}>
                                    <h2>{dictionary.disease_name}</h2>
                                    <Thumbnail  src={`/images/${dictionary.picture}`} alt="242x200" >

                                        <h3>Treatment</h3>
                                        <p>{dictionary.treatment}</p>
                                        <h3>Symptoms</h3>
                                        <p>{dictionary.symptoms}</p>
                                        <p>{dictionary.updated_at}</p>
                                    </Thumbnail>
                                </div>

                            ))}
                        </Tab>
                    ))}

                </Tabs>
            </Content>
        )
    }
}
Dictionary.propTypes = {
    match: PropTypes.object.isRequired,
}
