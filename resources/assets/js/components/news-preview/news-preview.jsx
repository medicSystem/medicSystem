import React from "react";
import PropTypes from "prop-types";
import { withStyles } from "@material-ui/core/styles";
import Card from "@material-ui/core/Card";
import CardActions from "@material-ui/core/CardActions";
import CardContent from "@material-ui/core/CardContent";
import CardMedia from "@material-ui/core/CardMedia";
import Button from "@material-ui/core/Button";
import Typography from "@material-ui/core/Typography";

const styles = {
  card: {
    width: 325,
    minHeight: 300
  },
  media: {
    height: 0,
    paddingTop: "56.25%" // 16:9
  }
};

function SimpleMediaCard(props) {
  const { classes } = props;
  let id = 0;
  if (props.id) {
    id = props.id;
  }
  const link = "/main/news#" + id.toString();
  const newsImg = "/images/" + props.image;
  const subtext = props.text.substring(0,90) + "...";
  return (
    <div>
      <Card className={classes.card}>
        <CardMedia
          className={classes.media}
          image={newsImg}
          title="Contemplative Reptile"
        />
        <CardContent>
          <Typography gutterBottom variant="headline" component="h2">
            {props.name}
          </Typography>
          <Typography component="p">{subtext}</Typography>
        </CardContent>
        <CardActions>
          <Button size="small" color="primary" href={link}>
            Learn More
          </Button>
        </CardActions>
      </Card>
    </div>
  );
}

SimpleMediaCard.propTypes = {
  classes: PropTypes.object.isRequired
};
SimpleMediaCard.defaultProps = {
    id: 0
};

export default withStyles(styles)(SimpleMediaCard);
