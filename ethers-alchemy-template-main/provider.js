import { ethers } from 'ethers';

const API_KEY="ueIHGygnDOIwZgRht0q190atrkRxVc5M"
const alchemyProvider = ethers.getDefaultProvider("sepolia",API_KEY);

export default alchemyProvider