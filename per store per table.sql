CREATE TABLE `0014` (
  `id` int(9) NOT NULL,
  `productid` int(99) NOT NULL,
  `store_code` varchar(99) NOT NULL,
  `store_name` varchar(99) NOT NULL,
  `date` varchar(99) NOT NULL,
  `brand` varchar(99) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `item_code` varchar(99) NOT NULL,
  `barcode` varchar(99) NOT NULL,
  `sku` varchar(99) NOT NULL,
  `qty` int(99) NOT NULL,
  `unit_price` varchar(99) NOT NULL,
  `backup` varchar(99) NOT NULL,
  `backup2` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `0014`
--
ALTER TABLE `0014`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `0014`
--
ALTER TABLE `0014`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;