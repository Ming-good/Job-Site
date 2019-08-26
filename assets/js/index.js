

tf.tensor([1, 2, 3, 4]).print();
web.log(tf.tensor([1, 2, 3, 4]), {lineSpace:true});

tf.tensor([[1, 2], [3, 4], [5, 6]]).print();
web.log(tf.tensor([[1, 2], [3, 4], [5, 6]]), {lineSpace:true});

tf.tensor([1, 2, 3, 4, 5, 6], [2, 3]).print();
web.log(tf.tensor([1, 2, 3, 4, 5, 6], [2, 3]), {lineSpace:true});

tf.tensor([11, 12, 13, 14, 15, 16], [3, 2]).print();
web.log(tf.tensor([11, 12, 13, 14, 15, 16], [3, 2]), {lineSpace:true});

tf.tensor([21, 22, 23, 24, 25, 26], [2, 3, 1]).print();
web.log(tf.tensor([21, 22, 23, 24, 25, 26], [2, 3, 1]), {lineSpace:true});


tf.tensor(10).print();
web.log(tf.tensor(20));

const tfone = tf.tensor2d([[1,2],[3,4]]);
const tftwo = tf.tensor2d([[5,6],[7,8]]);
tfone.mul(tftwo).print(true);
