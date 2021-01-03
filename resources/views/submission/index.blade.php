@extends('layouts.app')
@section('title', '作品提交说明')

@section('content')
<section class="submission-format">
    <div class="container">
        <div class="row mt-100 mb-100 justify-content-center">
            <div class="col-lg-12 mb-5">
                <div class="text-center">
                    <h2>作品格式说明</h2>
                </div>
            </div>
            <div class="row col-lg-4 col-8 justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12 title">
                            <h4>报告文档</h4>
                        </div>
                        <div class="col-lg-12 content">
                            <p>PDF格式，单个不超过20M</p>
                            <p>报告类文档附上大赛logo水印</p>
                            <p><a href="#"><img src="/images/new_capinno_logo.png" alt="" width="150"></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-lg-4 col-8 justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12 title">
                            <h4>图片文件</h4>
                        </div>
                        <div class="col-lg-12 content">
                            <p>宣传海报和展示文件</p>
                            <p>单词上传不可超过6张图片</p>
                            <p>单个不超过20M</p>
                            <p>附上大赛logo水印展示</p>
                            <p>文件尺寸以后期通知为准</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-lg-4 col-8 justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12 title">
                            <h4>视频文件</h4>
                        </div>
                        <div class="col-lg-12 content">
                            <p>格式：MP4或AVI格式</p>
                            <p>尺寸：显示比例为16:9（视频尺寸16:9为正常显示）</p>
                            <p>作品演示视频：单个不超过50M，时限不超过3分钟</p>
                            <p>内容传播视频：单个不超过100M，时限不超过8分钟</p>
                            <p>视频从头到尾统一添加大赛logo</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-lg-12 justify-content-center">
                <p>备注：赛事时间需根据实际运作情况可能会有微调，请紧密关注大赛官网及相关通知渠道。</p>
                <p>如有疑问请随时联系大赛组委会。</p>
            </div>
        </div>
    </div>
</section>
<section class="submission-schedule">
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-begin-tab" data-toggle="pill" href="#pills-begin" role="tab" aria-controls="pills-begin" aria-selected="true">初赛</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-final-tab" data-toggle="pill" href="#pills-final" role="tab" aria-controls="pills-final" aria-selected="false">决赛</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-final-roadshow-tab" data-toggle="pill" href="#pills-final-roadshow" role="tab" aria-controls="pills-final-roadshow" aria-selected="false">决赛路演</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-business-tab" data-toggle="pill" href="#pills-business" role="tab" aria-controls="pills-business" aria-selected="false">商业路演</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-begin" role="tabpanel" aria-labelledby="pills-begin-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center mb-5">
                                <h4>初赛作品文档提交要求</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">序号</th>
                                                <th scope="col">内容</th>
                                                <th scope="col">格式</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>需求分析报告</td>
                                                <td>PDF</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>设计创新提案</td>
                                                <td>PDF</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <p style="display: none;">文件提交截止时间：2021年2月14日 23:59</p>
                                        <p style="display: none;">评审时间：2021年2月21日</p>
                                        <p style="display: none;">结果公布时间：2021年2月23日</p>
                                        <div class="download-content">
                                            <h5>初赛模板文件下载</h5>
                                            <a href="#"><i class="iconfont icon-icclouddownload"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="pills-final" role="tabpanel" aria-labelledby="pills-final-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center mb-5">
                                <h4>决赛作品文档提交要求</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">序号</th>
                                                <th scope="col">内容</th>
                                                <th scope="col">备注</th>
                                                <th scope="col">格式</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>需求分析报告</td>
                                                <td>根据评委反馈进行修改</td>
                                                <td>PDF</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>产品商业计划书</td>
                                                <td></td>
                                                <td>PDF</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>品牌设计&产品效果图</td>
                                                <td></td>
                                                <td>PDF</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>上市推广海报</td>
                                                <td></td>
                                                <td>JPG/PNG</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>商品详情页面（长图）</td>
                                                <td></td>
                                                <td>JPG/PNG</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>样品提交</td>
                                                <td>寄送地址见模板下载链接</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>视频文件（建议提交）</td>
                                                <td>非“必交文件”</td>
                                                <td>MP4</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <p style="display: none;">文件提交截止时间：2021年4月4日 23:59</p>
                                        <p style="display: none;">评审时间：2021年4月11日</p>
                                        <p style="display: none;">结果公布时间：2021年4月13日</p>
                                        <p>补充说明：</p>
                                        <p>参加决赛的团队必须向组委会提交至少3分质量稳定的样品，邮寄时间以到达时间为准，邮寄地址请查看提交文件模板链接</p>
                                        <div class="download-content">
                                            <h5>决赛模板文件下载</h5>
                                            <a href="#"><i class="iconfont icon-icclouddownload"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="pills-final-roadshow" role="tabpanel" aria-labelledby="pills-final-roadshow-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center mb-5">
                                <h4>决赛路演作品文档提交要求</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">序号</th>
                                                <th scope="col">内容</th>
                                                <th scope="col">备注</th>
                                                <th scope="col">格式</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>决赛路演文件</td>
                                                <td></td>
                                                <td>PPT</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <p style="display: none;">文件提交截止时间：2020年4月17日 23:59</p>
                                        <p style="display: none;">评审时间：2021年4月18日</p>
                                        <p style="display: none;">结果公布时间：2021年4月20日</p>
                                        <p>补充说明：</p>
                                        <p>进入决赛路演现场的团队需向组委会提供15份质量稳定的样品以供评审品尝，若团队成员不能到达现场，可委派指定人员参加现场答辩环节，具体要求请根据大赛后期文件为准。</p>
                                        <div class="download-content">
                                            <h5>决赛路演模板文件下载</h5>
                                            <a href="#"><i class="iconfont icon-icclouddownload"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="pills-business" role="tabpanel" aria-labelledby="pills-business-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center mb-5">
                                <h4>商业路演作品文档提交要求</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">序号</th>
                                                <th scope="col">内容</th>
                                                <th scope="col">备注</th>
                                                <th scope="col">格式</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>商业路演文件</td>
                                                <td></td>
                                                <td>PPT</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 text-center">
                                        <div class="download-content">
                                            <h5>商业路演模板文件下载</h5>
                                            <a href="#"><i class="iconfont icon-icclouddownload"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
