<?php 
/**
 * �����ļ�
 *
 * @param �ļ�·��  $filepath
 * @return file
 */
function download_file($filepath) {
    //����ļ��Ƿ����
    if (file_exists($filepath)) {
        //���ļ�
        $file = fopen($filepath, "r");
        //���ص��ļ�����
        Header("Content-type: application/octet-stream");
        //�����ֽڴ�С����
        Header("Accept-Ranges: bytes");
        //�����ļ��Ĵ�С
        Header("Accept-Length: " . filesize($filepath));
        //����Կͻ��˵ĵ����Ի��򣬶�Ӧ���ļ���
        $showname = ltrim(strrchr($filepath, '/'), '/');
        Header("Content-Disposition: attachment; filename=" . $showname);
        //�޸�֮ǰ��һ���Խ����ݴ�����ͻ���
        echo fread($file, filesize($filepath));
        //�޸�֮��һ��ֻ����1024���ֽڵ����ݸ��ͻ���
        //��ͻ��˻�������
        $buffer = 1024; //
        //�ж��ļ��Ƿ����
        while (!feof($file)) {
            //���ļ������ڴ�
            $file_data = fread($file, $buffer);
            //ÿ����ͻ��˻���1024���ֽڵ�����
            echo $file_data;
        }
        fclose($file);
    } else {
        return false;
    }
}