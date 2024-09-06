import React from 'react';
import { View, Text, Image } from 'react-native';

const PhotoItem = ({ uri }) => (
  <View>
    <Image source={{ uri }} style={{ width: 100, height: 100 }} />
    <Text>{uri}</Text>
  </View>
);

export default PhotoItem;
