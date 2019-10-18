const one = tf.tensor([11, 12]);
tf.print(one);
web.log(one);

tf.tensor([21, 22]).print();
web.log(tf.tensor([21, 22]), {lineSpace:true});

tf.tensor([31, 32]).print(true);

const tsOne = tf.tensor2d([[1,2],[3,4]]).flatten();
web.log(tsOne);
alert(tsOne);
