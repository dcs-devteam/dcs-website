var chickensSecret = {
  reasons: [
    {answer: 'For the greater good.', person: 'Plato'},
    {answer: 'It was a historical inevitability.', person: 'Karl Marx'},
    {answer: 'So that its subjects will view it with admiration, as a chicken which has the daring and courage to boldly cross the road, but also with fear, for whom among them has the strength to contend with such a paragon of avian virtue?  In such a manner is the princely chicken\'s dominion maintained.', person: 'Machiavelli'},
    {answer: 'Because of an excess of light pink gooey stuff in its pancreas.', person: 'Hippocrates'},
    {answer: 'Give me ten minutes with the chicken and I\'ll find out.', person: 'Thomas de Torquemada'},
    {answer: 'Because that\'s the only kind of trip the Establishment would let it take.', person: 'Timothy Leary'},
    {answer: 'Because if you gaze too long across the Road, the Road gazes also across you.', person: 'Nietzsche'},
    {answer: 'National Security was at stake.', person: 'Oliver North'},
    {answer: 'Because the external influences which had pervaded its sensorium from birth had caused it to develop in such a fashion that it would tend to cross roads, even while believing these actions to be of its own free will.', person: 'B.F. Skinner'},
    {answer: 'The confluence of events in the cultural gestalt necessitated that individual chickens cross roads at this historical juncture, and therefore synchronicitously brought such occurrences into being.', person: 'Carl Jung'},
    {answer: 'In order to act in good faith and be true to itself, the chicken found it necessary to cross the road.', person: 'Jean-Paul Sartre'},
    {answer: 'The possibility of "crossing" was encoded into the objects "chicken" and "road", and circumstances came into being which caused the actualization of this potential occurrence.', person: 'Ludwig Wittgenstein'},
    {answer: 'Whether the chicken crossed the road or the road crossed the chicken depends upon your frame of reference.', person: 'Albert Einstein'},
    {answer: 'To actualize its potential.', person: 'Aristotle'},
    {answer: 'If you ask this question, you deny your own chicken-nature.', person: 'Buddha'},
    {answer: 'It may very well have been one of the most astonishing events to grace the annals of history.  A historic, unprecedented avian biped with the temerity to attempt such an herculean achievement formerly relegated to homo sapien pedestrians is truly a remarkable occurence.', person: 'Howard Cosell'},
    {answer: 'It was the logical next step after coming down from the trees.', person: 'Charles Darwin'},
    {answer: 'For fun.', person: 'Epicurus'},
    {answer: 'It didn\'t cross the road; it transcended it.', person: 'Ralph Waldo Emerson'},
    {answer: 'The eternal hen-principle made it do it.', person: 'Johann von Goethe'},
    {answer: 'To die. In the rain. Alone.', person: 'Ernest Hemingway'},
    {answer: 'Out of custom and habit.', person: 'David Hume'},
    {answer: 'What road?', person: 'Pyrrho the Skeptic'},
    {answer: 'You tell me.', person: 'The Sphinx'},
    {answer: 'If you saw me coming you\'d cross the road too!', person: 'Mr. T'},
    {answer: 'To live deliberately ... and suck all the marrow out of life.', person: 'Henry David Thoreau'},
    {answer: 'The news of its crossing has been greatly exaggerated.', person: 'Mark Twain'},
    {answer: 'To prove it could never reach the other side.', person: 'Zeno of Elea'},
    {answer: 'To wander lonely as a cloud.', person: 'Wordsworth'},
    {answer: 'To see heaven in a wild fowl.', person: 'Blake'},
    {answer: 'Sir, had you known the Chicken for as long as I have, you would not so readily enquire, but feel rather the need to resist such a public display of your own lamentable and incorrigible ignorance.', person: 'Dr Johnson'},
    {answer: 'Why, indeed? One\'s social engagements whilst in town ought never expose one to such barbarous inconvenience - although, perhaps, if one must cross a  road, one may do far worse than to cross it as the chicken in question.', person: 'Oscar Wilde'},
    {answer: 'It is, of course, inevitable that such a loathsome, filth-ridden and degraded creature as Man should assume to question the actions of one in all respects his superior.', person: 'Swift'},
    {answer: 'To have turned back were as tedious as to go o\'er.', person: 'Macbeth'},
    {answer: 'Clearly, having fallen victim to the fallacy of misplaced concreteness.', person: 'Whitehead'},
    {answer: 'That is not the question.', person: 'Hamlet'},
    {answer: 'It crosseth for thee.', person: 'Donne'},
    {answer: 'It was mimicking my Lord Hervey.', person: 'Pope'},
    {answer: 'To get a better view.', person: 'Constable'},
    {answer: 'We don\'t really care why the chicken crossed the road. We just want to know if the chicken is on our side of the road or not. The chicken is either with us or it is against us. There is no middle ground here.', person: 'George Bush'},
    {answer: 'Did the chicken cross the road?<br/>Did he cross it with a toad?<br/>Yes, The chicken crossed the road,<br/>But why it crossed, I\'ve not been told!', person: 'Dr. Seuss'},
    {answer: 'I envision a world where all chickens will be free to cross roads without having their motives called into question.', person: 'Martin Luther King'},
    {answer: 'In my day, we didn\'t ask why the chicken crossed the road. Someone told us that the chicken crossed the road, and that was good enough for us.', person: 'Grandpa'},
    {answer: 'It is the nature of chickens to cross the road.', person: 'Aristotle'},
    {answer: 'To boldly go where no chicken has gone before.', person: 'Captain Kirk'},
    {answer: 'I may not agree with what the chicken did, but I will defend to the death its right to do it.', person: 'Voltaire'},
    {answer: 'Did the chicken really cross the road or did the road move beneath the chicken?', person: 'Albert Einstein'},
    {answer: 'And God came down from the heavens, and He said unto the chicken, "Thou shalt cross the road." And the chicken crossed the road, and there was much rejoicing.', person: 'The Bible'},
    {answer: 'To come, to see, to conquer.', person: 'Julius Caesar'},
    {answer: 'It was predestined.', person: 'John Calvin'},
    {answer: 'It had sufficient reason to believe it was dreaming anyway.', person: 'Rene Descartes'},
    {answer: 'To cross the road less traveled by.', person: 'Robert Frost'},
    {answer: 'It had a dream.', person: 'Martin Luther King'},
    {answer: 'The end of crossing the road justifies whatever motive there was.', person: 'Machiavelli'}
  ],
  index: 0,
};
chickensSecret.index = Math.floor(Math.random() * chickensSecret.reasons.length);

_secrets.extend('chickens', function() {
  bash.log('<span class="yellow">Why did the chicken cross the road?</span>');
  bash.log(chickensSecret.reasons[chickensSecret.index].answer);
  bash.log('<span class="green">- ' + chickensSecret.reasons[chickensSecret.index].person + '</span>');
  chickensSecret.index = (chickensSecret.index + 1) % chickensSecret.reasons.length;
});